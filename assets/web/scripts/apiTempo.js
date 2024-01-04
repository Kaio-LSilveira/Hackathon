// Substitua 'SUA_API_KEY' pela sua chave de API da Weatherstack
const apiKey = 'c12a27f4b7e89d114eecb44d1880c197';
const cidade = 'Charqueadas';

// URL da API da Weatherstack para a previsão do tempo atual
const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${cidade}&appid=${apiKey}`;

// Função para buscar os dados da previsão do tempo
async function getWeatherData() {
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        // Exibe os dados da previsão do tempo
        const weatherDiv = document.getElementById('weather');
        console.log(data)
        weatherDiv.innerHTML = `
            <p class="text-light">Temperatura: ${(data.main.temp.toFixed(2) - 273).toFixed(2)}°C</p>
            <p class="text-light">Sensação térmica: ${(data.main.feels_like.toFixed(2) - 273).toFixed(2)}°C</p>
            <p class="text-light">Condição: ${data.weather[0].description}</p>
        `;
        console.log(data)
    } catch (error) {
        console.error('Erro ao buscar dados da previsão do tempo:', error);
    }
}

// Chama a função para buscar os dados da previsão do tempo
getWeatherData();


