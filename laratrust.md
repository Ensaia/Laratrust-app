# Roles And Permissions
# Setting things up 

Let's start by creating the following Roles:

``` 
 $owner = Role::create([
     'name' => 'owner',
     'display_name' => 'Project Owner', // optional
     'description' => 'User is the owner of a given project', // optional
 ]);
 
 $admin = Role::create([
     'name' => 'admin',
     'display_name' => 'User Administrator', // optional
     'description' => 'User is allowed to manage and edit other users', // optional
 ]);

 ```
Now we need to add Permissions:

``` 
$createPost = Permission::create([
'name' => 'create-post',
'display_name' => 'Create Posts', // optional
'description' => 'create new blog posts', // optional
]);

$editUser = Permission::create([
'name' => 'edit-user',
'display_name' => 'Edit Users', // optional
'description' => 'edit existing users', // optional
]);

```
# Role Permissions Assignment And Removal
# Assignment
``` 
$admin->attachPermission($createPost); // parameter can be a Permission object, array or id
// equivalent to $admin->permissions()->attach([$createPost->id]);

$owner->attachPermissions([$createPost, $editUser]); // parameter can be a Permission object, array or id
// equivalent to $owner->permissions()->attach([$createPost->id, $editUser->id]);

$owner->syncPermissions([$createPost, $editUser]); // parameter can be a Permission object, array or id
// equivalent to $owner->permissions()->sync([$createPost->id, $editUser->id]);

```
# Removal
``` 
$admin->detachPermission($createPost); // parameter can be a Permission object, array or id
// equivalent to $admin->permissions()->detach([$createPost->id]);

$owner->detachPermissions([$createPost, $editUser]); // parameter can be a Permission object, array or id
// equivalent to $owner->permissions()->detach([$createPost->id, $editUser->id]);

```
#  User Roles Assignment And Removal

With both roles created let's assign them to the users.

# Assignment

``` 
$user->attachRole($admin); // parameter can be a Role object, BackedEnum, array, id or the role string name
// equivalent to $user->roles()->attach([$admin->id]);

$user->attachRoles([$admin, $owner]); // parameter can be a Role object, BackedEnum, array, id or the role string name
// equivalent to $user->roles()->attach([$admin->id, $owner->id]);

$user->syncRoles([$admin->id, $owner->id]);
// equivalent to $user->roles()->sync([$admin->id, $owner->id]);

$user->syncRolesWithoutDetaching([$admin->id, $owner->id]);
// equivalent to $user->roles()->syncWithoutDetaching([$admin->id, $owner->id]);

```
#  Removal

``` 
$user->detachRole($admin); // parameter can be a Role object, BackedEnum, array, id or the role string name
// equivalent to $user->roles()->detach([$admin->id]);

$user->detachRoles([$admin, $owner]); // parameter can be a Role object, BackedEnum, array, id or the role string name
// equivalent to $user->roles()->detach([$admin->id, $owner->id]);

```
# User Permissions Assignment And Removal
You can attach single permissions to a user, so in order to do it you only have to make:
#  Assignment
``` 
$user->attachPermission($editUser); // parameter can be a Permission object, array, id or the permission string name
// equivalent to $user->permissions()->attach([$editUser->id]);

$user->attachPermissions([$editUser, $createPost]); // parameter can be a Permission object, array, id or the permission string name
// equivalent to $user->permissions()->attach([$editUser->id, $createPost->id]);

$user->syncPermissions([$editUser->id, $createPost->id]);
// equivalent to $user->permissions()->sync([$editUser->id, createPost->id]);

$user->syncPermissionsWithoutDetaching([$editUser, $createPost]); // parameter can be a Permission object, array or id
    // equivalent to $user->permissions()->syncWithoutDetaching([$createPost->id, $editUser->id]);

```
#  Removal
``` 
$user->detachPermission($createPost); // parameter can be a Permission object, array, id or the permission string name
// equivalent to $user->permissions()->detach([$createPost->id]);

$user->detachPermissions([$createPost, $editUser]); // parameter can be a Permission object, array, id or the permission string name
// equivalent to $user->permissions()->detach([$createPost->id, $editUser->id]);

```
# Checking for Roles And Permissions
``` 
$user->hasRole('owner');   // false
$user->hasRole('admin');   // true
$user->isAbleTo('edit-user');   // false
$user->isAbleTo('create-post'); // true

```

    NOTE

    - If you want, you can use the hasPermission or isAbleTo.
    - If you want, you can use the isA and isAn methods instead of the hasRole method.
#
    NOTE

    - We dropped the usage of the can method in order to have full support to Laravel's Gates and Policies.

Both isAbleTo() and hasRole() can receive an array or pipe separated string of roles & permissions to check:

``` 
$user->hasRole(['owner', 'admin']);       // true
$user->isAbleTo(['edit-user', 'create-post']); // true

$user->hasRole('owner|admin');       // true
$user->isAbleTo('edit-user|create-post'); // true

```
Both hasPermission() and hasRole() can receive an array or pipe separated string of roles & permissions to check:
``` 
$user->hasRole(['owner', 'admin']);       // true
$user->hasPermission(['edit-user', 'create-post']); // true

$user->hasRole('owner|admin');       // true
$user->hasPermission('edit-user|create-post'); // true
```
By default, if any of the roles or permissions are present for a user then the method will return true. Passing true as a second parameter instructs the method to require all of the items:
``` 
$user->hasRole(['owner', 'admin']);             // true
$user->hasRole(['owner', 'admin'], true);       // false, user does not have admin role
$user->hasPermission(['edit-user', 'create-post']);       // true
$user->hasPermission(['edit-user', 'create-post'], true); // false, user does not have edit-user permission
```
# User ability
More advanced checking can be done using the awesome ability function. It takes in three parameters (roles, permissions, options):

    roles is a set of roles to check.
    permissions is a set of permissions to check.
    options is a set of options to change the method behavior.
Either of the roles or permissions variable can be a pipe separated string or an array:
``` 
$user->ability(['admin', 'owner'], ['create-post', 'edit-user']);

// or

$user->ability('admin|owner', 'create-post|edit-user');
```
# Blade Templates
``` 
@role('admin')
    <p>This is visible to users with the admin role. Gets translated to
    \Laratrust::hasRole('admin')</p>
@endrole

@permission('manage-admins')
    <p>This is visible to users with the given permissions. Gets translated to
    \Laratrust::hasPermission('manage-admins'). The @can directive is already taken by core
    laravel authorization package, hence the @permission directive instead.</p>
@endpermission

@ability('admin,owner', 'create-post,edit-user')
    <p>This is visible to users with the given abilities. Gets translated to
    \Laratrust::ability('admin,owner', 'create-post,edit-user')</p>
@endability
```

# Soft Deleting
``` 
$role = Role::findOrFail(1); // Pull back a given role

// Regular Delete
$role->delete(); // This will work no matter what

// Force Delete
$role->users()->sync([]); // Delete relationship data
$role->permissions()->sync([]); // Delete relationship data

$role->forceDelete(); //
```
