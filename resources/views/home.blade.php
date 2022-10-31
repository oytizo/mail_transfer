<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form role="form" id="formAddUser" action="" method="post">
                                    @csrf
                                    <div class="form-group form-group-default required">
                                        <label>Name</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="name">
                                    </div>
                                    <div class="errorname">
                                    </div>
                                    <div class="form-group form-group-default required">
                                        <label>Address</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                            placeholder="address">
                                    </div>
                                    <div class="erroraddress">
                                    </div>
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" id="city" name="city" class="form-control"
                                            placeholder="city">
                                    </div>
                                    <div class="errorcity">
                                    </div>
                                    <div style="margin-top: 25px">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                                class="fa fa-plus-circle"></i>
                                            Add</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
        $(".close").click(function() {
            jQuery('.form-control').val('');
            jQuery('.errorname').html('<p></p>');
            jQuery('.errorcity').html('<p></p>');
            jQuery('.erroraddress').html('<p></p>');
        });
        $('#formAddUser').on('submit', function(e) {
            e.preventDefault();

            let name_user = $('input[name="name"]').val();
            let address_user = $('input[name="address"]').val();
            let city_user = $('input[name="city"]').val();

            jQuery('.errorname').html('<p></p>');
            jQuery('.errorcity').html('<p></p>');
            jQuery('.erroraddress').html('<p></p>');

            $.ajax({
                url: 'addcategory',
                method: 'post',
                data: {
                    "name": name_user,
                    "address": address_user,
                    "city": city_user
                },
                success: function(data) {
                    if (data.status == '1') {
                        alert(data.data);
                        jQuery('.form-control').val('');
                    }
                    if(data.status == '0'){
                        alert(data.data);
                        jQuery('.form-control').val('');
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $('.error' + key).html('<p class="text-danger">' + val[0] + '</p>');
                    })
                }
            });
        });
    </script>

</body>

</html>
