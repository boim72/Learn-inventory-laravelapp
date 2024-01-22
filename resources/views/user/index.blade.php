
@extends('layouts/main')
@section('container')
    
<div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-auto grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profil User</h4>  
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama User</th>
                          <th>Email</th>
                          <th>Role</th>
                        </tr>
                      </thead>
                      <tbody>
                         <tr>
                         <td>{{ 1 }}</td>
                          <td>{{ auth()->user()->name }}</td>
                          <td>{{ auth()->user()->email }}</td>
                          <td>
                            <label class="badge badge-info">{{ auth()->user()->role }}</label>
                          </td>
                          {{-- <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td> --}}
                          <td>
                            {{-- <a href="/user/{{ $user->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a>  --}}
                                <!-- Button trigger modal -->
                            
                            {{-- <label class="badge badge-danger">Pending</label> --}}
                           </td>
                        </tr>
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              @can('iniAdmin')
                  
                <div class="col-md-auto grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Table User</h4>
                          {{-- <a href="/user/create" ><span class="badge badge-sm bg-gradient-primary"> Tambah Data</span></a> --}}
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Acion</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                              $i = 1;
                          @endphp
                        @foreach ($user as $user)
                        @if ($user->id !== auth()->user()->id)
                          <tr>
                          <td>{{ $i++}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              <label class="badge badge-info">{{ $user->role }}</label>
                            </td>
                            {{-- <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td> --}}
                            <td>
                              {{-- <a href="/user/{{ $user->id }}/edit"><span data-feather="edit" class="badge badge-sm bg-gradient-success">Edit</span></a>  --}}
                                  <!-- Button trigger modal -->
                            {{-- @if ($user->id !== auth()->user()->id) --}}
                              <form action="{{ route('user.updateRole', $user->id) }}" method="post" class="d-inline" enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                <div class="btn-group">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownRole_{{ $user->id }}">
                                          {{ ucfirst($user->role) }}
                                      </button>
                                      <div class="dropdown-menu">
                                          @foreach(['staf', 'admin', 'pemilik'] as $roleOption)
                                              <button class="dropdown-item" type="button" onclick="setRole('{{ $user->id }}', '{{ $roleOption }}')">{{ ucfirst($roleOption) }}</button>
                                          @endforeach
                                      </div>
                                  </div>

                                  <input type="hidden" name="role" id="selectedRole_{{ $user->id }}" value="{{ $user->role }}">
                                  <input type="hidden" name="id" id="selectedId_{{ $user->id }}" value="{{ $user->id }}">
                                  
                                  <button type="submit" class="btn btn-primary btn-sm">Update Role</button>
                                  <button type="button" class="btn btn-secondary btn-sm" onclick="cancelRole('{{ $user->role }}')">Cancel</button>
                              </div>
                            
                              </form>
                              <form action="/user/{{ $user->id }}" class="d-inline" method="post">
                                  @method('delete')
                                  @csrf
                                  <button class="badge bg-danger border-0" onclick="return confirm('apakah yakin')">Hapus</button>
                              </form>
                              {{-- <label class="badge badge-danger">Pending</label> --}}
                            </td>
                          </tr>
                            @endif
                        @endforeach
                          
                          {{-- <tr>
                            <td>Messsy</td>
                            <td>Flash</td>
                            <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                            <td><label class="badge badge-warning">In progress</label></td>
                          </tr> --}}
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              @endcan
            
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
@endsection

  <script>
        function setRole(userId, role) {
              document.getElementById('dropdownRole_' + userId).textContent = role;
              document.getElementById('selectedRole_' + userId).value = role;
              document.getElementById('selectedId_' + userId).value = userId;
          }

        function cancelRole(originalRole) {
            document.getElementById('dropdownRole').textContent = originalRole;
            document.getElementById('selectedRole').value = originalRole;
        }
    </script>