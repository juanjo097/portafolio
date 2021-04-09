let theme_lclstr = localStorage.getItem('theme');
theme_lclstr ==  null ? setTheme('light') : setTheme(theme_lclstr);

let theme_dots = document.getElementsByClassName('theme-dot');


for (var i = 0; theme_dots.length > i; i++) {

    theme_dots[i].addEventListener('click', function()
    {
        let mode = this.dataset.mode;
        console.log('clicked color: ', mode);
        setTheme(mode);
    })
    
}

function setTheme(mode)
{
    switch (mode) 
    {
        case 'light':
            document.getElementById('theme-style').href = 'styles/styles.css';
            break;
        case 'blue':
            document.getElementById('theme-style').href = 'styles/blue.css';
            break;
        case 'green':
            document.getElementById('theme-style').href = 'styles/green.css';
            break;
        case 'purple':
            document.getElementById('theme-style').href = 'styles/purple.css';
            break;
        default:
            document.getElementById('theme-style').href = 'styles/styles.css';
            break;
    }
    localStorage.setItem('theme', mode)
}