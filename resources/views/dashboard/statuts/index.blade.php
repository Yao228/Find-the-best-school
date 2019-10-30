@extends('layouts.dashboard')

@section('content')
<div class="row">
     <div class="row">	
        <!-- Recent Activity -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">				
                    <a href="{{ route('statuts.create') }}" class="button small border mon-addbtn" style="float: right;margin-top: 1%; margin-right: 2%;">
                        <i class="sl sl-icon-plus"></i> Ajouter un statut</a>
                <h4>Liste des statuts</h4>
                    
                @if($statuts->count() > 0)
                <table class="basic-table">
                    <tbody>
                        <tr>
                            <th>Nom</th>
                            <th>Nombre d'école</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($statuts as $statut )
                        <tr>
                            <td data-label="Nom">{{ $statut->name }}</td>
                            <td data-label="Nombre d'école">{{ $statut->school->count() }}</td>
                            <td data-label="Action">
                                <a href="{{ route('statuts.edit', $statut)}}" class="button border small">
                                    <i class="sl sl-icon-note"></i>
                                </a>
                                <a href="#small-dialog" class="button border small popup-with-zoom-anim" onclick="handleDelete({{ $statut->id }})">
                                    <i class="sl sl-icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                @else
                <p class="text-center padding-top-20 padding-bottom-20">
                    <strong> <i class="im im-icon-Angry"></i> Pas de statut actuelement</strong>
                </p>
                @endif
                <!-- Reply to review popup -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                    <form action="" method="POST" id="deleteTagForm">
                        @csrf
                            @method('DELETE')
                    <div class="small-dialog-header">
                        <h3>Supprimer ce statut</h3>
                    </div>
                    <div class="message-reply margin-top-0 text-center">
                        <p class="text-center">
                            <strong>Vous êtes sûr de vouloir supprimer ce statut?</strong>
                        </p>
                        <hr>
                        <button type="submit" class="button">Oui, supprimer</button>
                    </div>
                    </form>
                </div>
            </div>
        <div class="clearfix"></div>
		{{ $statuts->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id){
        
        var form = document.getElementById('deleteTagForm')
        form.action = '/dashboard/statuts/'
    }
</script>
   
@endsection