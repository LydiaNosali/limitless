
@extends('layouts.app', ['activePage' => 'repertoire', 'titlePage' => __('Repertoire')])
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rep</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>
<body>
<DIV ALIGN="CENTER">
    <h2> Ajouter repertoire</h2>
    <span> Repertoire père :</span>
    <select name="repertoireid" id="repertoireid" style="width :200px">
        <option>  </option>
        @foreach($data as $d)
            <option value="{{ $d->id }}"  >
                {{ $d->nom }}


            </option>

        @endforeach

    </select>


</DIV>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $("#repertoireid").select2({
        placeholder:'select répertoire père',
        allowClear: true
    });
</script>
<DIV ALIGN="CENTER">
    <form action="/insert" method="post">
        <table>

            <tr>

                <td> nom du repertoire </td>
                <td> <input type="text" name="nomrepertoire"> </td>

            </tr>
            <tr>
                <td> <input type="button" name="Ajouter" value="Add"> </td>
            </tr>
        </table>
    </form>
</DIV>


</body>

@endsection


