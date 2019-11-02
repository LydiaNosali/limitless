@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ">Table des agences</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-dark">
                                    <th>
                                        Numéro
                                    </th>
                                    <th>
                                        Nom
                                    </th>
                                    <th>
                                        Adresse
                                    </th>
                                    <th>
                                        Directeur
                                    </th>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Agence de Dely Brahim
                                        </td>
                                        <td>
                                            233 rue Ahmed Ouaked, Dély Ibrahim - Alger
                                        </td>
                                        <td>
                                            Chaouki Benayache
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Agence Kouba
                                        </td>
                                        <td>
                                            24 Djenane Ben Omar, Kouba - Alger
                                        </td>
                                        <td>
                                            Tarek Lazaar
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Agence de Bab Ezouar
                                        </td>
                                        <td>
                                            Coopérative Boushaki F lot N°186, Bab Ezzouar - Alger
                                        </td>
                                        <td>
                                            Brahim Benazzi
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            Agence de Setif
                                        </td>
                                        <td>
                                            Cite Mounaouarart Lararssa Lot 147 N° 11 Setif
                                        </td>
                                        <td>
                                            Khaled Bounazou
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                            Agence de Blida
                                        </td>
                                        <td>
                                            Boulevard Mohamed Boudiaf propriété N°88 Lot N°102-Blida
                                        </td>
                                        <td>
                                            Karim derrouiche
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                            Agence Oran
                                        </td>
                                        <td>
                                            05 Coopérative Adnane Mustapha, Zhun Usto Bir El Djir - Oran
                                        </td>
                                        <td>
                                            Farid Boudjabi
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            7
                                        </td>
                                        <td>
                                            Agence Constantine
                                        </td>
                                        <td>
                                            Boulevard Zouiche Amar N° 08, Sidi Mabrouk Supérieur - Constantine                      </td>
                                        <td>
                                            Ines Mili
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            8
                                        </td>
                                        <td>
                                            Agence Ouargla
                                        </td>
                                        <td>
                                            Cité Chorfa, Route nationale N° 49 - Ouargla                      </td>
                                        <td>
                                            Mohieddine Benhellal
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            9
                                        </td>
                                        <td>
                                            Agence Hassiba
                                        </td>
                                        <td>
                                            Rue Hassiba Ben Bouali, Cité HLM n° : 03 Sidi M’hamed Alger Centre                      </td>
                                        <td>
                                            Ahmed Ait Younes
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            10
                                        </td>
                                        <td>
                                            Agence Sidi Yahia
                                        </td>
                                        <td>
                                            04 rue Hamdani Lahcen, Sidi Yahia, Hydra                      </td>
                                        <td>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            11
                                        </td>
                                        <td>
                                            Agence Adrar
                                        </td>
                                        <td>
                                            Rue Bouzidi Abdelkader Lot Propriété n° : 145 Section n°: 30 Adrar                      </td>
                                        <td>
                                            Reda Abderrahimi
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            12
                                        </td>
                                        <td>
                                            Agence Biskra
                                        </td>
                                        <td>
                                            Cité Sayhi Lot n° : 69, Propriété n° : 109 - 110 Biskra                      </td>
                                        <td>
                                            El Bah Al Aid
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            13
                                        </td>
                                        <td>
                                            Agence Batna
                                        </td>
                                        <td>
                                            Cité El Matar N°240 Rue de Biskra, Batna                      </td>
                                        <td>
                                            Brahim Aouragh
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            14
                                        </td>
                                        <td>
                                            Agence Annaba
                                        </td>
                                        <td>
                                            Cité 240 Logts Plaine Ouest, Ilot B N° : 03 - Annaba                      </td>
                                        <td>
                                            Farouk Babas
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            15
                                        </td>
                                        <td>
                                            Agence Staoueli
                                        </td>
                                        <td>
                                            Route Nationale N°11, Ilot N° 402 Lot N° 04 - Staoueli                      </td>
                                        <td>
                                            Malek Cheriet
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
