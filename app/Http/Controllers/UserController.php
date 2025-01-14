<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    // UserController.php

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // UserController.php

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validate the input, including the password field
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|string',
        'password' => 'nullable|min:6|confirmed', // Make password optional
    ]);

    // Only update the password if it is provided
    if ($request->filled('password')) {
        $validated['password'] = bcrypt($request->password);
    } else {
        // Don't include the password in the update if it's not filled
        unset($validated['password']);
    }

    // Update the user with validated data
    $user->update($validated);

    return redirect()->back()->with('success', 'User updated successfully');
}



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

}
