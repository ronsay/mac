                        @if(isset($photo))
                            <tr class="d-flex gal-element">
                                <th class="col-1"><h3></h3></th>
                                <td class="col-4 text-center">
                                    <img class="img-fluid" src="{{ url('/img/gallery/'.$gallery->url.'/fit/'.$photo->image)}}" alt="Index">
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
                        @endif
