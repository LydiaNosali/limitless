@extends('layouts.app', ['activePage' => 'repertoire', 'titlePage' => __('Repertoire')])
@section('content')
    <div class="content">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Sommaire des repertoires</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('repertoire') }}" class="btn btn-sm btn-dark">{{ __('Revenir en arriére') }}</a>
                                </div>
                            </div>
                           <?php
                            use App\Repertoire;
                            $maxcols = 3;
                            $i = 0;

                            //Open the table and its first row
                            echo "<table>";
                                echo "<tr>";
                                    $repertoires=Repertoire::get();
                                    foreach($repertoires as $repertoire) {

                                    if ($i == $maxcols) {
                                    $i = 0;
                                    echo "</tr><tr>";
                                    }

                                    echo "<td>$repertoire->repertoire</td>";

                                    $i++;

                                    }

                                    //Add empty <td>'s to even up the amount of cells in a row:
                                        while ($i <= $maxcols) {
                                        echo "<td>&nbsp;</td>";
                                    $i++;
                                    }

                                    //Close the table row and the table
                                    echo "</tr>";
                                echo "</table>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

