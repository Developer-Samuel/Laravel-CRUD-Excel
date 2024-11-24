<?php

namespace App\Services;

use Illuminate\Http\Request;

use App\Models\User;

use App\Services\ExcelService;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public static function list($perPage = 10)
    {
        list($data) = ExcelService::prepareData();

        if (empty($data)) {
            return new LengthAwarePaginator([], 0, $perPage, 1, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
        }

        $users = [];
        $rows = $data[0]->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }

            if (empty($row[1]) || empty($row[2]) || empty($row[3]) || empty($row[4]) || empty($row[5])) {
                continue;
            }

            $users[] = [
                'ID' => (int) $row[0],
                'Firstname' => (string) $row[1],
                'Lastname' => (string) $row[2],
                'Username' => (string) $row[3],
                'Email' => (string) $row[4],
                'Gender' => (string) $row[5],
            ];
        }

        $usersCollection = collect($users);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $usersCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginator = new LengthAwarePaginator(
            $currentItems,
            $usersCollection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return $paginator;
    }

    public static function find($id)
    {
        list($data) = ExcelService::prepareData();

        if (empty($data)) {
            return null;
        }

        $rows = $data[0]->toArray();

        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue;
            }

            if ((int) $row[0] === (int) $id) {
                return new User(
                    (int) $row[0],
                    (string) $row[1],
                    (string) $row[2],
                    (string) $row[3],
                    (string) $row[4],
                    (string) $row[5]
                );
            }
        }

        return null;
    }

    public static function create(Request $request)
    {
        $filePath = storage_path('app/public/imports/users.xlsx');

        $rows = [];
        if (file_exists($filePath)) {
            $data = Excel::toArray([], $filePath);

            $rows = !empty($data) ? $data[0] : [];
        }

        $newUser = [
            self::generateNewId($rows),
            $request->input('firstname'),
            $request->input('lastname'),
            $request->input('username'),
            $request->input('email'),
            ucfirst($request->input('gender')),
        ];

        $rows[] = $newUser;

        Excel::store(new UsersExport($rows), 'public/imports/users.xlsx');
    }

    public static function update(Request $request, int $id)
    {
        $filePath = storage_path('app/public/imports/users.xlsx');

        $rows = [];
        if (file_exists($filePath)) {
            $data = Excel::toArray([], $filePath);
            $rows = !empty($data) ? $data[0] : [];
        }

        foreach ($rows as &$row) {
            if ((int) $row[0] === $id) {
                $row[1] = $request->input('firstname');
                $row[2] = $request->input('lastname');
                $row[5] = ucfirst($request->input('gender'));
                break;
            }
        }

        Excel::store(new \App\Exports\UsersExport($rows), 'public/imports/users.xlsx');
    }

    public static function delete($id)
    {
        $filePath = storage_path('app/public/imports/users.xlsx');

        $rows = [];
        if (file_exists($filePath)) {
            $data = Excel::toArray([], $filePath);
            $rows = !empty($data) ? $data[0] : [];
        }

        foreach ($rows as $index => $row) {
            if ((int) $row[0] === (int) $id) {
                unset($rows[$index]);
                break;
            }
        }

        $rows = array_values($rows);

        Excel::store(new \App\Exports\UsersExport($rows), 'public/imports/users.xlsx');
    }

    private static function generateNewId($rows)
    {
        $lastId = 0;
        foreach ($rows as $row) {
            $lastId = max($lastId, (int) $row[0]);
        }
        return $lastId + 1;
    }
}
