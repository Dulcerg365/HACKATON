const API_KEY = 'sk-proj-4GcLksTXiRG7KDjiMxHaT3BlbkFJy921pfE4D5HsHyZtv6rF';
async function getCompletion(prompt)
{
    const res = await fetch("https://api.openai.com/v1/chat/completions" , {
        method: 'POST' , 
        headers: {
            'Content-Type': 'application/json' , // Corregido 'applicacation' a 'application'
            'Authorization' : 'Bearer ' + API_KEY
        },
        body: JSON.stringify({
                model: 'gpt-3.5-turbo-0125',
                messages: [
                    {
                        "role": "user" , "content" : prompt
                    }
                ],
                max_tokens: 150
        })

    }); 
    return await res.json();
}
let historychat = "";
const prompt = document.querySelector('#prompt');
const enviar = document.querySelector('#enviar');
const salida = document.querySelector('#salida');

enviar.addEventListener('click' , async() => {
    if(!prompt.value) return;
    const response = await getCompletion(prompt.value);
    historychat = "<br>ASISTENTE: " + response.choices[0].message.content +"<br>" + "<br>Tu: " + prompt.value +"<br>" + historychat;
    salida.innerHTML = historychat;
    prompt.value = "";
});