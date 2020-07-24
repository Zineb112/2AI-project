// DOM

const AboutMore = document.querySelector('.aboutUs__right--more')
const AboutMoreBtn = document.querySelector('.aboutUs__right--moreBtn')


const cardCommu = document.querySelector('.servicesUs__card1')
const cardAudio = document.querySelector('.servicesUs__card2')
const cardEvent = document.querySelector('.servicesUs__card3')

const imgComm = document.querySelector('.servicesUs__img1')
const imgCommAlt = document.querySelector('.servicesUs__imgAlt1')

const imgAudio = document.querySelector('.servicesUs__img2')
const imgAudioAlt = document.querySelector('.servicesUs__imgAlt2')

const imgEvent = document.querySelector('.servicesUs__img3')
const imgEventAlt = document.querySelector('.servicesUs__imgAlt3')

const divCommu = document.querySelector('.displayComm')
const divAudio = document.querySelector('.displayAudio')
const divEvent = document.querySelector('.displayEvent')

// EVENT

AboutMoreBtn.addEventListener('click',MUs)

cardCommu.addEventListener('click',fCommunication);
cardAudio.addEventListener('click',fAudio);
cardEvent.addEventListener('click',fEvent);

// More aboutUs function

function MUs(){
    AboutMore.style.display = 'block'
    AboutMoreBtn.style.display = 'none'
}

// Communication function

function fCommunication(){
    divCommu.style.display = 'block'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    imgComm.style.display ='block'
    imgCommAlt.style.display ='none'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardCommu.classList.add('cardActive')

}

// Audio function

function fAudio(){
    divCommu.style.display = 'none'
    divAudio.style.display ='block'
    divEvent.style.display ='none'
    imgAudio.style.display ='block'
    imgAudioAlt.style.display ='none'
    imgComm.style.display ='none'
    imgCommAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'
    cardAudio.classList.add('cardActive')
    cardEvent.classList.remove('cardActive')
    cardCommu.classList.remove('cardActive')
}

// Event function

function fEvent(){
    divCommu.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='block'
    imgEvent.style.display ='block'
    imgEventAlt.style.display ='none'
    imgComm.style.display ='none'
    imgCommAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.add('cardActive')
    cardCommu.classList.remove('cardActive')
}
