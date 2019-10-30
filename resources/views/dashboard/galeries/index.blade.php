@extends('layouts.dashboard')

@section('content')
<div class="row">
     <div class="row">	
        <!-- Recent Activity -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">				
                    <a href="{{ route('galeries.create') }}" class="button small border mon-addbtn" style="float: right;margin-top: 1%; margin-right: 2%;">
                        <i class="sl sl-icon-plus"></i> Ajouter une iamge</a>
                <h4>Liste des images de votre galerie</h4>
                    
                @if($schools->count() > 0)
                <table class="basic-table border">
                    <tbody>
                        <tr>
                            <th>Ecoles liée</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($schools as $school)
                        <tr>
                            @if ( $school->images)
                            <td data-label="Ecole">{{ $school->name }}</td>
                            <td data-label="Image"> <img src="{{ asset("storage/$school->images") }}" width="200" height="100" alt=""></td>
                            <td data-label="Action">
                               {{--  <a href="{{ route('galeries.edit', $school->id)}}" class="button border small">
                                    <i class="sl sl-icon-note"></i>
                                </a> --}}
                                <a href="#small-dialog" class="button border small popup-with-zoom-anim" onclick="handleDelete({{ $school->id }})">
                                    <i class="sl sl-icon-trash"></i>
                                </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                @else
                <p class="text-center padding-top-20 padding-bottom-20">
                    <strong> <i class="im im-icon-Angry"></i> Pas de photos actuellement</strong>
                </p>
                @endif
                <!-- Reply to review popup -->
                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                    <form action="" method="POST" id="deleteTagForm">
                        @csrf
                            @method('DELETE')
                    <div class="small-dialog-header">
                        <h3>Supprimer cette photo</h3>
                    </div>
                    <div class="message-reply margin-top-0 text-center">
                        <p class="text-center">
                            <strong>Vous êtes sûr de vouloir supprimer cette photo ?</strong>
                        </p>
                        <hr>
                        <button quartier="submit" class="button">Oui, supprimer</button>
                    </div>
                    </form>
                </div>
        </div>
        <div class="clearfix"></div>
        {{ $schools->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id){
        
        var form = document.getElementById('deleteTagForm')
        form.action = '/dashboard/galeries/' + id
    }
</script>
   
@endsection