@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/profile.css') }}">
<div class="holder">
  <div class="wrapper">
    <div class="table-holder">
      <h1>User Information</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Attribute</th>
            <th scope="col">Values</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">User Type</th>
            <td>{{ $user->user_type }}</td>
          </tr>
          <tr>
            <th scope="row">First Name</th>
            <td>{{ $user->first_name }}</td>
          </tr>
          <tr>
            <th scope="row">Last Name</th>
            <td>{{ $user->last_name }}</td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th scope="row">Edit Profile</th>
            <td><a href="#"><i class="fa fa-edit"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>