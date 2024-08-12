<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $divisionId = $request->input('division_id');
        $query = Employee::with('division');

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($divisionId) {
            $query->where('division_id', $divisionId);
        }

        $employees = $query->paginate(6);

        $employeeData = [];

        foreach ($employees as $employee) {
            $employeeData[] = [
                'id' => $employee->id,
                'image' => url($employee->image), 
                'name' => $employee->name,
                'phone' => $employee->phone,
                'division' => [
                    'id' => $employee->division->id,
                    'name' => $employee->division->name,
                ],
                'position' => $employee->position,
            ];
        }

        $response = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => [
                'employees' => $employeeData,
            ],
            'pagination' => [
                'current_page' => $employees->currentPage(),
                'last_page' => $employees->lastPage(),
                'per_page' => $employees->perPage(),
                'total' => $employees->total(),
            ],
        ];

        return response()->json($response);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:15',
            'division' => 'required|exists:divisions,id',
            'position' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = now()->format('Ymd_His') . '.' . $image->getClientOriginalExtension();
            $imagePath = 'employees/' . $imageName;
            $image->move(public_path('employees'), $imageName);
        }

        Employee::create([
            'name' => $request->name,
            'image' => $imagePath,
            'phone' => $request->phone,
            'division_id' => $request->division,
            'position' => $request->position,
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Employee created successfully',
        ];

        return response()->json($response, 201);
    }
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:15',
            'division' => 'required|exists:divisions,id',
            'position' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors(),
                'data' => null
            ], 400);
        }

        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found',
                'data' => null
            ], 404);
        }

        $imagePath = $employee->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = now()->format('Ymd_His') . '.' . $image->getClientOriginalExtension();
            $imagePath = 'employees/' . $imageName;
            $image->move(public_path('employees'), $imageName);
        }

        $employee->update([
            'name' => $request->name,
            'image' => $imagePath,
            'phone' => $request->phone,
            'division_id' => $request->division,
            'position' => $request->position,
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Employee updated successfully',
        ];

        return response()->json($response, 200);
    }
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'status' => 'error',
                'message' => 'Employee not found',
            ], 404);
        }

        $employee->delete();

        $response = [
            'status' => 'success',
            'message' => 'Employee deleted successfully',
        ];

        return response()->json($response, 200);
    }

}
