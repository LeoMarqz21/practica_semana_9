

export class SendData{
    constructor(){
        this.name = document.getElementById('name').value;
        this.address = document.getElementById('address').value;
        this.form = document.getElementById('form');

        this._name = document.getElementById('name_client');
        this._address = document.getElementById('address_client');
        this._product = document.getElementById('product');
        this._units = document.getElementById('units');
        this._discount = document.getElementById('discount');
        this._total = document.getElementById('total');
    }

    validate(){
        if(this.name.length < 10 || this.name == ""){
            alert("Nombre muy corto o esta vacio, ingresa tu nombre completo");
        }else{
            if(this.address.length < 10 || this.address == ""){
                alert('Tu direccion esta vacia o es muy corta y poco descriptiva');
            }else{
                return true;
            }
        }
    }

    send(permit){
        if(permit === true){
            const data = new FormData(this.form);
            fetch("http://localhost/PROYECTOS/DAW_21/semana_9/server/index.php", {
                method: 'POST',
                body:data
            })
            .then(response => response.json())
            .then(data =>{
                this._name.value = data.name;
                this._address.value = data.address;
                this._product.value = "Pizza " + data.product;
                this._units.value = data.units;
                this._discount.value = data.discount + "%";
                this._total.value = "$" + data.total.toFixed(2);
            //    console.log(data);
            })
        }
    }

    print(data){
        this._name.textContent = data.name;
    }

    clean(){
        document.getElementById('name').value = "";
        document.getElementById('address').value = "";
    }
}

