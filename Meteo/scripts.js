
const show = document.getElementById('show');
const table = document.getElementById('table');
const search = document.getElementById('citySelect');
const btn_search = document.getElementById('btn_search');

async function fetchApi(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        console.log(data);
        return data;
    } catch (error) {
        console.error('An error occurred:', error);
    }
}

function searchByCity(city) {

    let url = new URL('https://www.prevision-meteo.ch/services/json/' + city);
    console.log(url);
    fetchApi(url).then(data => showWeather(data));
}

function showWeather(data) {

    console.log(data.city_info.name);
    console.log(data.current_condition.icon_big);

    let figure = document.createElement('figure');
    let img = document.createElement('img');
    let figcaption = document.createElement('figcation');
    let src = '/img/soleil.png';

    if (data.current_condition.tmp < 18) {
        src = '/img/pull.png';
    };

    if (data.current_condition.condition.toLowerCase().includes('pluie') || data.current_condition.condition.toLowerCase().includes('orage')) {
        src = '/img/parapluie.png';
    }

    figure.appendChild(img);
    figure.appendChild(figcaption);
    show.appendChild(figure);

    img.setAttribute('src', src);
    figcaption.textContent = data.city_info.name;

    table.innerHTML = '<tr><th>Date</th><th>Day</th><th>Temperature</th><th>Condition</th><th>Icon</th></tr>';
    table.innerHTML += '<tr><td>' + data.current_condition.date + '</td><td>Today</td><td>' + data.current_condition.tmp + '</td><td>' + data.current_condition.condition + '</td><td><img src="' + data.current_condition.icon_big + '" alt="icon"></img></td></tr>';
    table.innerHTML += '<tr><td>' + data.fcst_day_0.date + '</td><td>' + data.fcst_day_0.day_long + '</td><td>' + data.fcst_day_0.tmin + ' - ' + data.fcst_day_0.tmax + '</td><td>' + data.fcst_day_0.condition + '</td><td><img src="' + data.fcst_day_0.icon_big + '" alt="icon"></img></td></tr>';
    table.innerHTML += '<tr><td>' + data.fcst_day_1.date + '</td><td>' + data.fcst_day_1.day_long + '</td><td>' + data.fcst_day_1.tmin + ' - ' + data.fcst_day_0.tmax + '</td><td>' + data.fcst_day_1.condition + '</td><td><img src="' + data.fcst_day_1.icon_big + '" alt="icon"></img></td></tr>';
    table.innerHTML += '<tr><td>' + data.fcst_day_2.date + '</td><td>' + data.fcst_day_2.day_long + '</td><td>' + data.fcst_day_2.tmin + ' - ' + data.fcst_day_0.tmax + '</td><td>' + data.fcst_day_2.condition + '</td><td><img src="' + data.fcst_day_2.icon_big + '" alt="icon"></img></td></tr>';
    table.innerHTML += '<tr><td>' + data.fcst_day_3.date + '</td><td>' + data.fcst_day_3.day_long + '</td><td>' + data.fcst_day_3.tmin + ' - ' + data.fcst_day_0.tmax + '</td><td>' + data.fcst_day_3.condition + '</td><td><img src="' + data.fcst_day_3.icon_big + '" alt="icon"></img></td></tr>';
    table.innerHTML += '<tr><td>' + data.fcst_day_4.date + '</td><td>' + data.fcst_day_4.day_long + '</td><td>' + data.fcst_day_4.tmin + ' - ' + data.fcst_day_0.tmax + '</td><td>' + data.fcst_day_4.condition + '</td><td><img src="' + data.fcst_day_4.icon_big + '" alt="icon"></img></td></tr>';

}


btn_search.addEventListener('click', event => {
    event.preventDefault();
    let city = search.value;
    console.log(city);

    show.innerHTML = '';

    searchByCity(city);

});