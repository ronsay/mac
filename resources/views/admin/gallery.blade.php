@extends('admin/template')

@section('content')
                @if(isset($gallery))
                    <h1>{{$gallery->title}}</h1>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-photo">Ajouter une photo</button>
                            <button type="button" class="btn btn-primary" id="save-gallery">Sauvegarder</button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <table class="table table-bordered table-striped">
                            <tbody>
                        @if(isset($photos))
                            @foreach($photos as $photo)
                                <tr class="d-flex gal-element">
                                    <th class="col-1"><h3>{{$photo->orderimg}}</h3></th>
                                    <td class="col-4 text-center">
                                        <img class="img-fluid" src="{{ url('/img/gallery/'.$gallery->url.'/fit/'.$photo->image) }}" alt="{{$photo->orderimg}}">
                                    </td>
                                    <td class="col-5">
                                        <div class="form-group">
                                            <label>Nom du projet</label>
                                            <input type="text" class="form-control photo-title" value="{{$photo->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Localisation</label>
                                            <input type="text" class="form-control photo-localization" value="{{$photo->localization}}">
                                        </div>
                                        <input type="hidden" class="photo-id" value="{{$photo->id}}"/>
                                    </td>
                                    <td class="col-2">
                                        <button class="btn btn-secondary up"><span class="oi oi-caret-top"></span></button>
                                        <button class="btn btn-secondary down"><span class="oi oi-caret-bottom"></span></button>
                                        <button class="btn btn-danger remove" data-toggle="modal" data-target="#del-confirm"><span class="oi oi-x"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <script>
                        var galId = '{{$gallery->id}}';
                    </script> 
                @endif
                
                <div class="modal" tabindex="-1" role="dialog" id="del-confirm">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Suppression d'une photo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Êtes vous sûr de vouloir supprimer cette photo ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm-del">Oui</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="modal" tabindex="-1" role="dialog" id="new-photo">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Nouvelle photo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center" id="new-photo-dropzone">                              
                            <div id="dz-actions" class="border-primary">
                                <span class="text-primary">
                                    Glissez le fichier ici ou cliquez ici pour charger l'image
                                </span>
                            </div>
                            <div class="alert alert-danger d-none" role="alert" id="dz-error">Erreur lors du chargement de l'image</div>
                            <div id="previews">
                                <div id="template">
                                  <div>
                                      <span class="preview"><img class="img-fluid py-3" data-dz-thumbnail /></span>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary start d-none">
                                    </button>
                                    <button data-dz-remove class="btn btn-danger cancel">
                                        <span>Supprimer la photo</span>
                                    </button>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" id="confirm-add">Ajouter</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                </div>
@stop