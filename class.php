<?php


class CRUD{

    public function Insert($post)
    {
        global $db;

        $ins = $db->prepare("INSERT into isciler set

            AdSoyad=:y,
            Vezife=:kreslo,
            Maas=:eh,
            av=:av,
            tel=:tel,
            qeyd_tarixi=:tarix
        ");
        $x = $ins->execute([
            'y'=>$post["x"],
            'kreslo'=>$post["vezife"],
            'eh'=>$post["maas"],
            'av'=>$post["av"],
            'tel'=>$post["tel"],
            'tarix'=>date("Y-m-d H:i:s")
        ]);
        return $x ? 1 : 0;
    }

    public function Update($post)
    {
        global $db;

        $ins = $db->prepare("UPDATE isciler set

            AdSoyad=:y,
            Vezife=:kreslo,
            Maas=:eh,
            av=:av,
            tel=:tel
            where id=:id
        ");
        $x = $ins->execute([
            'y'=>$post["x"],
            'kreslo'=>$post["vezife"],
            'eh'=>$post["maas"],
            'av'=>$post["av"],
            'tel'=>$post["tel"],
            'id'=>$post["id"]
        ]);
        return $x ? 1 : 0;
    }
    public function Select()
    {
        global $db;
        $select = $db->prepare("SELECT * from isciler");
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Delete($id)
    {
        global $db;
        $delete = $db->prepare("DELETE from isciler where id={$id}");
        return $delete->execute() ? 1 : 0;

    }
}