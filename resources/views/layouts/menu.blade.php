@role(App\Role::ROLE_ADMIN)
@include('layouts.partial.menu_admin')
@endrole

@role(App\Role::ROLE_OWNER)
@include('layouts.partial.menu_owner')
@endrole