@extends('layouts.app')
@section('content')
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="text-center">My Bookmarks List</h1>
                <p class="text-center">Secure and useful bookmarks lister for you.</p>
            </div>
        </div>
        <div class="add_bookmark container-fluid">

            <button type="button" class="btn btn-primary" style="margin: 10px 0px;" data-toggle="modal" data-target="#addbookmark">
                Add Bookmmark
            </button>




            <!-- add bookmark -->
            <div class="modal" id="addbookmark">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add a new Bookmark Here.</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            @if($errors->any())

                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger small">
                                        <p> {{ $error }} </p>
                                    </div>
                                @endforeach

                                <script type='text/javascript'>
                                    jQuery(document).ready(function () {
                                        jQuery('#addbookmark').modal('show');
                                    });
                                </script>

                            @endif

                            <form action="/create_bookmark" method="POST">
                                @csrf
                                <input type="text" class="form-control" name='title' placeholder="Page title" >
                                <input type="text" class="form-control" name='link' placeholder="Page URL" >
                                <input type="text" class="form-control" name='tag' placeholder="Page Tag" >
                                <input type="submit" name="bookmark" class="btn btn-success" value="Create Bookmark">
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <div class="bookmark_table container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Number</th>
                            <th>Link</th>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                        <?php $i = 0; ?>
                        @foreach($bookmarks as $value)
                        <?php $i++;  ?>
                            <tr class="text-center">
                                <td>{{ $i }}</td>
                                <td><a href="{{ $value->link }}" target="blank">{{ $value->title }}</a></td>
                                <td>{{ $value->tag }}</td>
                                <td> <a href="/bookmark/{{ $value->id }}" style="margin-right: 5px;"
                                        class="btn btn-info text-white">Edit</a> <a href="/delete/{{ $value->id }}" class="btn btn-danger text-white">Delete</a> </td>
                            </tr>
                        @endforeach

                        <?php
                            if (isset($singlebookmark)) {
                        ?>
                            <script type='text/javascript'>
                                jQuery(document).ready(function () {
                                    jQuery('#updatebookmark').modal(
                                        'show');
                                });
                            </script>


                        <!-- Update bookmark -->
                        <div class="modal" id="updatebookmark">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add a new Bookmark Here.</h4>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        @if($errors->any())

                                        @foreach($errors->all() as $error)
                                        <div class="alert alert-danger small">
                                            <p> {{ $error }} </p>
                                        </div>
                                        @endforeach

                                        <script type='text/javascript'>
                                            jQuery(document).ready(function () {
                                                jQuery('#updatebookmark').modal('show');
                                            });
                                        </script>

                                        @endif
                                        <form action="/update_bookmark/{{ $singlebookmark->id }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name='title'
                                                placeholder="Page title" value="{{$singlebookmark->title}}">
                                            <input type="text" class="form-control" name='link'
                                                placeholder="Page URL" value="{{$singlebookmark->link}}">
                                            <input type="text" class="form-control" name='tag'
                                                placeholder="Page Tag" value="{{$singlebookmark->tag}}">
                                            <input type="submit" name="bookmark" class="btn btn-success"
                                                value="Update Bookmark">
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>

                                                <?php
                            }
                        ?>

                    </table>
                </div>
            </div>
        </div>
@endsection
