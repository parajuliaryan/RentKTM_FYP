@include('layouts.app')
@include('layouts.nav')
<link rel="stylesheet" href="{{ asset('css/frontend-css/profile.css') }}">
<div class="holder">
    <div class="mini-nav">
        <ul>
            <li><a href="#">Messages</a></li>
            <li><a href="#">Posted Ads</a></li>
        </ul>
    </div>
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
                <th scope="row">First Name</th>
                <td>{{ $email }}</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
</div>