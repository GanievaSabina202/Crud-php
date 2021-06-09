
function Sil(id){
    
    let x = confirm("Məlumatın silinməsinə əminsinizmi?");

    x ? location.href = `index.php?sil=ok&id=${id}` : "";
    
}


function TelYoxla(v){
    let tel = document.getElementsByClassName("telefon");
    let arr = [];

    for(let i = 0; i<tel.length;i++){
        arr.push(tel[i].textContent);
    }
    console.log(arr);
    for(let i = 0; i < tel.length;i++ ){
        if(v==arr[i]){
            document.getElementById("telHelp").innerHTML = "Telefon Nömrəsi artıq istifadə olunub!";
            document.getElementById("gnd").setAttribute("disabled","disabled");
        }
    }
}

function Getir(i,id){
    let data  = document.getElementsByClassName("data")[i];
    let AdSoyad  = data.getElementsByTagName("td")[0].textContent;
    let Vezife  = data.getElementsByTagName("td")[1].textContent;
    let Maas  = data.getElementsByTagName("td")[2].textContent;
    let av  = data.getElementsByTagName("td")[3].textContent;
    let telefon  = data.getElementsByTagName("td")[4].textContent;

    document.getElementById("id").value = id;
    document.getElementById("rAdSoyad").value = AdSoyad;
    document.getElementById("rvezife").value = Vezife;
    document.getElementById("rmaas").value = Number(Maas.match(/\d/g).join(""));
    document.getElementById("rtel").value = telefon;
    document.getElementById(av=="Evli" ? "rEvli" : "rSubay" ).checked = true;
    
}