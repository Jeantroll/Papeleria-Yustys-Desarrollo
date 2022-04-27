@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div style="background: #C9F1DB; color: #35B06D; text-align: center;">
            <h4>Registrar venta</h4>
            </div>
            <br>
            <img src="https://s3-alpha-sig.figma.com/img/a22b/8209/d8cbef9e50107c85c2739cde59130c5f?Expires=1652054400&Signature=f5vblw2BYDWEZF0NW5r8GHFcGvP8GUehCCSIpMzhTlHlWsxpeO0Y-tnJr3r4SgvMvOawdZ4yfyd86Z8I8PeEIIyvAbBCpp9igc9Z17y7y1wWc3Gj6BxzVyrYe3Y8N8SEFFgY5fScflkDcD95KzJgd9nVYACV~K4C7h-BC1Ybusw~RS2aEew-ixog1B-S~i6uFbgp-dWsXRfqeClr3YB98AO1kiCoOAAC1yud7hPZQyJmNBoAW4sMU4OBl2Ng4JuZYbGvrMCqy2uSmBoII0-L9Vzy585P2SqrDmYs6Y7wmJ1q7OAf7-ctSjbV3Rj1tBq1iP3w1aYRFWYW2XsEri7esw__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA" alt="">
        </div>
        <div class="col-md-9">

            <input style="background: #C9F1DB !important; color: #47B87B; font-weight: bold;" type="text" value="Documento cliente" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>
            <input style="background: #C9F1DB !important; color: #47B87B; font-weight: bold;" type="text" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>
            <select style="background: #C9F1DB !important; color: #47B87B; font-weight: bold;" class="w-50 h-22 form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            <br>
            <input style="background: #C9F1DB !important; color: #47B87B; font-weight: bold;" type="text" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>
            <input style="background: #C9F1DB !important; color: #47B87B; font-weight: bold;" type="text" class="w-50 h-22 form-control" id="inputGroupFile01">
            <br>
            <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; border-radius: 50px; width: 200px !important; font-size: 20px !important; " type="button" class="btn btn-primary">Primary</button>
            <button style="background: #0EC3C7 !important; border-color: #0EC3C7 !important; border-radius: 50px; width: 200px !important;font-size: 20px !important; " type="button" class="btn btn-primary">Primary</button>
            </div>

        </div>
    </div>
</div>
@endsection