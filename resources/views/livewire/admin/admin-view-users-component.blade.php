<div class="p-5">
    <table class="table table-striped text-center">
        <tr>
            <th>Avatar</th>
            <th>Location</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Status</th>
            <th>User Role</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>
                    @if($user->avatar == null)
                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                    @else
                        <img src="{{asset('assets/imgs/avatar')}}/{{$user->name}}/{{$user->avatar}}" width="150">
                    @endif
                </td>
                <td>
                    <iframe 
                    width="300" 
                    height="170" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0" 
                    marginwidth="0" 
                    src="https://maps.google.com/maps?q={{$user->lat}},{{$user->lang}}&hl=es&z=14&amp;output=embed"
                    >
                    </iframe>
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->ph_num}}</td>
                <td>
                    @if($user->status == 'Active')
                        <span class="text-success">{{$user->status}}</span>
                    @endif
                    @if($user->status == 'Ban')
                        <span class="text-danger">{{$user->status}}</span>
                    @endif
                </td>
                <td>{{$user->utype}}</td>
                <td class="text-center">  
                    <div class="input-group">
                        <div class="mx-auto">
                            <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">Change Role</button>
                            <ul class="dropdown-menu">
                              <li><a href="#" wire:click.prevent="changeadm({{$user->id}})">ADM</a></li>
                              <li><a href="#" wire:click.prevent="changeusr({{$user->id}})">USR</a></li>
                            </ul>
                        </div>                                            
                        <div class="mx-auto">
                            <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">User Status</button>
                            <ul class="dropdown-menu">
                              <li><a href="#" wire:click.prevent="changeact({{$user->id}})">Active</a></li>
                              <li><a href="#" wire:click.prevent="changeban({{$user->id}})">Tmp-Ban</a></li>
                            </ul>
                        </div>                                            
                        
                    </div>    
                </td>
            </tr>
        @endforeach
    </table>
</div>
