@extends('layouts.dashboard')

@section('content')
<div class="row">
     <div class="row">	
        <!-- Recent Activity -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">				
                   {{--  <a href="{{ route('users.create') }}" class="button small border mon-addbtn" style="float: right;margin-top: 1%; margin-right: 2%;">
                        <i class="sl sl-icon-plus"></i> Ajouter un user</a> --}}
                <h4>Liste des utilisateurs</h4>
                    
                @if($users->count() > 0)
                <table class="basic-table border">
                    <tbody>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Changer en admin</th>
                        </tr>
                        @foreach ($users as $user )
                        <tr>
                            <td data-label="Image"> <img width="40px" height="40px" style="border-radius:50%" src="{{ Gravatar::src($user->email) }}" alt=""></td>
                            <td data-label="Nom">{{ $user->name }}</td>
                            <td data-label="Action">{{ $user->email }}</td>
                            <td>
                                @if (!$user->isAdmin())
                                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="button">Changer en admin</button>
                                </form>                  
                                @endif
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                @else
                <p class="text-center padding-top-20 padding-bottom-20">
                    <strong> <i class="im im-icon-Angry"></i> Pas d'utilisateur actuelement</strong>
                </p>
                @endif
                <!-- Reply to review popup -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                    <form action="" method="POST" id="deleteTagForm">
                        @csrf
                            @method('DELETE')
                    <div class="small-dialog-header">
                        <h3>Supprimer ce user</h3>
                    </div>
                    <div class="message-reply margin-top-0 text-center">
                        <p class="text-center">
                            <strong>Vous êtes sûr de vouloir supprimer cet utilisateur ?</strong>
                        </p>
                        <hr>
                        <button user="submit" class="button">Oui, supprimer</button>
                    </div>
                    </form>
                </div>
            </div>
        <div class="clearfix"></div>
		{{ $users->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id){
        
        var form = document.getElementById('deleteTagForm')
        form.action = '/dashboard/users/' + id
    }
</script>
   
@endsection