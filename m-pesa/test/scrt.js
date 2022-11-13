const d=document.getElementById('body')
const f=document.getElementById('e')

f.onclick=()=>{
    fetch('https://ipgeolocation.abstractapi.com/v1/?api_key=7b3cb85a39474633bcb68724119c7b10&ip_address=10.52.16.144').then(response=>response.json()).then(json=>console.log(json))
}

