<!DOCTYPE html>
<html>

<head>
    <?php require_once 'code.php' ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        table {
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <h1 class="display-4 text-center message">Qeydiyyat Siyahısı</h1>
    <div class="container-fluid">
        <button style="float: right;" class="btn btn-outline-info" data-toggle="modal" data-target="#elave">Əlavə Et</button>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ad Soyad</th>
                    <th scope="col">Vəzifə</th>
                    <th scope="col">Maaş</th>
                    <th scope="col">AV</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Qeydiyyat Tarixi</th>
                    <th>Əməliyyatlar</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i<count($data); $i++){ ?>
                    <tr class="data">
                        <th scope="row"><?= $count++; ?></th>
                        <td><?= $data[$i]["AdSoyad"] ?></td>
                        <td><?= $data[$i]["Vezife"] ?></td>
                        <td><?= $data[$i]["Maas"] ?> AZN</td>
                        <td><?= $data[$i]["av"] ?></td>
                        <td class="telefon"><?= $data[$i]["tel"] ?></td>
                        <td><?= $data[$i]["qeyd_tarixi"] ?></td>
                        <td>
                            <button onclick="Sil(<?= $data[$i]['id'] ?>)" class="btn btn-outline-danger btn-sm">Sil</button>
                            <button onclick="Getir(<?= $i ?>,<?= $data[$i]['id'] ?>)" data-toggle="modal" data-target="#redakte" class="btn btn-outline-info btn-sm">Redaktə</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="elave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Əlavə Et</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <label for="AdSoyad" class="col-form-label">Ad Soyad:</label>
                            <input type="text" class="form-control" name="x" id="AdSoyad" />
                        </div>
                        <div class="form-group">
                            <label for="vezife" class="col-form-label">Vəzifə:</label>
                            <input type="text" class="form-control" name="vezife" id="vezife" />
                        </div>
                        <div class="form-group">
                            <label for="maas" class="col-form-label">Maaş:</label>
                            <input type="number" step="0.01" class="form-control" name="maas" id="maas" />
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Telefon:</label>
                            <input type="tel" aria-describedby="telHelp" onkeyup="TelYoxla(this.value)" class="form-control" name="tel" id="tel" />
                            <small id="telHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="Evli" name="av" class="custom-control-input" value="Evli" />
                                <label class="custom-control-label" for="Evli">Evli</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="Subay" name="av" class="custom-control-input" value="Subay" />
                                <label class="custom-control-label" for="Subay">Subay</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                            <button class="btn btn-primary" id="gnd" name="gnd">Göndər</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="redakte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Redakte Et</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <input type="hidden" value="" name="id" id="id" />
                        <div class="form-group">
                            <label for="rAdSoyad" class="col-form-label">Ad Soyad:</label>
                            <input type="text" class="form-control" name="x" value="" id="rAdSoyad" />
                        </div>
                        <div class="form-group">
                            <label for="rvezife" class="col-form-label">Vəzifə:</label>
                            <input type="text" class="form-control" name="vezife" value="" id="rvezife" />
                        </div>
                        <div class="form-group">
                            <label for="rmaas" class="col-form-label">Maaş:</label>
                            <input type="number" step="0.01" class="form-control" value="" name="maas" id="rmaas" />
                        </div>
                        <div class="form-group">
                            <label for="rtel" class="col-form-label">Telefon:</label>
                            <input type="tel" value="" aria-describedby="telHelp" onkeyup="TelYoxla(this.value)" class="form-control" name="tel" id="rtel" />
                            <small id="telHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="rEvli" name="av"  class="custom-control-input" value="Evli" />
                                <label class="custom-control-label" for="Evli">Evli</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="rSubay" name="av"  class="custom-control-input" value="Subay" />
                                <label class="custom-control-label" for="Subay">Subay</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                            <button class="btn btn-primary" id="gnd" name="rdk">Redakte Et</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script>
    let message = document.getElementsByClassName("message")[0];
    let status = `<?= @$_GET["status"] ?>`;

    if(status=="ok"){
        message.innerHTML = "Əməliyyat Uğurla icra edildi";
        setTimeout(Yonlendir,1500);
    }
    if(status=="no"){
        message.innerHTML = "Əməliyyat icra edilmədi";
        setTimeout(Yonlendir,1500);
    }


    function Yonlendir(){
        location.href = "index.php";
    }

    </script>
</body>

</html>