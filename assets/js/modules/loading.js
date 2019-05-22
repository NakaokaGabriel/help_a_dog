export default class Loading
{
    constructor(loading, body)
    {
        this.loading = document.querySelector(loading);
        this.body = document.querySelector(body);

        this.loadingPag = this.loadingPag.bind(this);
    }

    // Definira quanto tempo para remover a classe do body
    loadingPag()
    {
        setTimeout(() => {
            this.loading.removeAttribute('class');
        }, 500);
    }

    eventLoad()
    {
        window.addEventListener('load', this.loadingPag);
    }
    
    init()
    {
        if(this.loading && this.body)
        {
            this.eventLoad();
            return(this);
        }
    }
}
