const buttons = document.querySelectorAll(".list-item-pokemon");
const infoPanels = document.querySelectorAll(".pokeinfo");
const closeButton = document.querySelectorAll('.close-button');
const hoverMessage = document.createElement('div');
hoverMessage.innerText = 'Haz clic para ver la informacion del Pokémon';

// Establecer estilos para el mensaje
hoverMessage.style.backgroundColor = 'rgba(0, 0, 0, 0.7)'; // Fondo negro con opacidad
hoverMessage.style.color = 'white'; // Texto blanco
hoverMessage.style.padding = '10px'; // Añadir un relleno para mayor visibilidad

document.body.appendChild(hoverMessage);

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('mouseover', () => {
        hoverMessage.style.display = 'block';
        hoverMessage.style.position = 'absolute';
        hoverMessage.style.top = buttons[i].offsetTop + 'px';
        hoverMessage.style.left = buttons[i].offsetLeft + buttons[i].offsetWidth + 10 + 'px';
    });

    buttons[i].addEventListener('mouseout', () => {
        hoverMessage.style.display = 'none';
    });

    buttons[i].addEventListener('click', () => {
        for (let j = 0; j < infoPanels.length; j++) {
            infoPanels[j].style.display = "none";
        }
        infoPanels[i].style.display = "flex";
        hoverMessage.style.display = 'none';
    });

    closeButton[i].addEventListener('click', () => {
        infoPanels[i].style.display = 'none';
    });
}
