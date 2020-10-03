// DOM

const AboutMore = document.querySelector('.aboutUs__right--more')
const AboutMoreBtn = document.querySelector('.aboutUs__right--moreBtn')

const PlusA = document.querySelector('.listPlusA')
const ListA1 = document.querySelector('.maskListA1')
const ListA2 = document.querySelector('.maskListA2')
const ListA3 = document.querySelector('.maskListA3')
const ListA4 = document.querySelector('.maskListA4')
const ListA5 = document.querySelector('.maskListA5')

const PlusD = document.querySelector('.listPlusD')
const ListD1 = document.querySelector('.maskListD2')
const ListD2 = document.querySelector('.maskListD2')


const cardDesign = document.querySelector('.servicesUs__card1')
const cardAudio = document.querySelector('.servicesUs__card2')
const cardEvent = document.querySelector('.servicesUs__card3')
const cardDigitalisation = document.querySelector('.servicesUs__card4')
const cardPresse = document.querySelector('.servicesUs__card5')
const cardLocation = document.querySelector('.servicesUs__card6')
const cardShooting = document.querySelector('.servicesUs__card7')
const cardDigital = document.querySelector('.servicesUs__card8')
const cardConseil = document.querySelector('.servicesUs__card9')



const imgDesign = document.querySelector('.servicesUs__img1')
const imgDesignAlt = document.querySelector('.servicesUs__imgAlt1')

const imgAudio = document.querySelector('.servicesUs__img2')
const imgAudioAlt = document.querySelector('.servicesUs__imgAlt2')

const imgEvent = document.querySelector('.servicesUs__img3')
const imgEventAlt = document.querySelector('.servicesUs__imgAlt3')

const imgDigitalisation = document.querySelector('.servicesUs__img4')
const imgDigitalisationAlt = document.querySelector('.servicesUs__imgAlt4')

const imgPresse = document.querySelector('.servicesUs__img5')
const imgPresseAlt = document.querySelector('.servicesUs__imgAlt5')

const imgLocation = document.querySelector('.servicesUs__img6')
const imgLocationAlt = document.querySelector('.servicesUs__imgAlt6')

const imgShooting = document.querySelector('.servicesUs__img7')
const imgShootingAlt = document.querySelector('.servicesUs__imgAlt7')

const imgDigital = document.querySelector('.servicesUs__img8')
const imgDigitalAlt = document.querySelector('.servicesUs__imgAlt8')

const imgConseil = document.querySelector('.servicesUs__img9')
const imgConseilAlt = document.querySelector('.servicesUs__imgAlt9')



const divDesign = document.querySelector('.displayDesign')
const divAudio = document.querySelector('.displayAudio')
const divEvent = document.querySelector('.displayEvent')
const divDigitalisation = document.querySelector('.displayDigitalisation')
const divPresse = document.querySelector('.displayPresse')
const divLocation = document.querySelector('.displayLocation')
const divShooting = document.querySelector('.displayShooting')
const divDigital = document.querySelector('.displayDigital')
const divConseil = document.querySelector('.displayConseil')

// EVENT
if(AboutMoreBtn !== null)
AboutMoreBtn.addEventListener('click',MUs);

if(PlusA !== null)
PlusA.addEventListener('click',ListAudio);
if(PlusD !== null)
PlusD.addEventListener('click',ListDigitalisation);



if(cardDesign !== null)
cardDesign.addEventListener('click',fDesign);

if(cardAudio !== null)
cardAudio.addEventListener('click',fAudio);

if(cardEvent !== null)
cardEvent.addEventListener('click',fEvent);

if(cardDigitalisation !== null)
cardDigitalisation.addEventListener('click',fDigitalisation);

if(cardPresse !== null)
cardPresse.addEventListener('click',fPress);

if(cardLocation !== null)
cardLocation.addEventListener('click',fLocation);

if(cardShooting !== null)
cardShooting.addEventListener('click',fShooting);

if(cardDigital !== null)
cardDigital.addEventListener('click',fDigital);

if(cardConseil !== null)
cardConseil.addEventListener('click',fConseil);

// More aboutUs function

function MUs(){
    AboutMore.style.display = 'block'
    AboutMoreBtn.style.display = 'none'
}

// More List functions

function ListAudio(){
    ListA1.style.display = 'block'
    ListA2.style.display = 'block'
    ListA3.style.display = 'block'
    ListA4.style.display = 'block'
    ListA5.style.display = 'block'
    PlusA.style.display = 'none'
}

function ListDigitalisation(){
    ListD1.style.display = 'block'
    ListD2.style.display = 'block'
    PlusD.style.display = 'none'
}

// Design service function

function fDesign(){
    divDesign.style.display = 'block'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='block'
    imgDesignAlt.style.display ='none'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.add('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')

}

// Audio function

function fAudio(){
    divDesign.style.display = 'none'
    divAudio.style.display ='block'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='block'
    imgAudioAlt.style.display ='none'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.add('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Event function

function fEvent(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='block'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='block'
    imgEventAlt.style.display ='none'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.add('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}


// Digitalisation function

function fDigitalisation(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='block'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='block'
    imgDigitalisationAlt.style.display ='none'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.add('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Press function

function fPress(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='block'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='block'
    imgPresseAlt.style.display ='none'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.add('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Location function

function fLocation(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='block'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='block'
    imgLocationAlt.style.display ='none'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.add('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Shooting function

function fShooting(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='block'
    divDigital.style.display ='none'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='block'
    imgShootingAlt.style.display ='none'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.add('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Digital function

function fDigital(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='block'
    divConseil .style.display ='none'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='block'
    imgDigitalAlt.style.display ='none'
    imgConseil.style.display ='none'
    imgConseilAlt.style.display ='block'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.add('cardActive')
    cardConseil.classList.remove('cardActive')
}

// Conseil function

function fConseil(){
    divDesign.style.display = 'none'
    divAudio.style.display ='none'
    divEvent.style.display ='none'
    divDigitalisation.style.display ='none'
    divPresse.style.display ='none'
    divLocation.style.display ='none'
    divShooting.style.display ='none'
    divDigital.style.display ='none'
    divConseil .style.display ='block'

    imgDesign.style.display ='none'
    imgDesignAlt.style.display ='block'
    imgAudio.style.display ='none'
    imgAudioAlt.style.display ='block'
    imgEvent.style.display ='none'
    imgEventAlt.style.display ='block'

    imgDigitalisation.style.display ='none'
    imgDigitalisationAlt.style.display ='block'
    imgPresse.style.display ='none'
    imgPresseAlt.style.display ='block'
    imgLocation.style.display ='none'
    imgLocationAlt.style.display ='block'

    imgShooting.style.display ='none'
    imgShootingAlt.style.display ='block'
    imgDigital.style.display ='none'
    imgDigitalAlt.style.display ='block'
    imgConseil.style.display ='block'
    imgConseilAlt.style.display ='none'

    cardDesign.classList.remove('cardActive')
    cardAudio.classList.remove('cardActive')
    cardEvent.classList.remove('cardActive')
    cardDigitalisation.classList.remove('cardActive')
    cardPresse.classList.remove('cardActive')
    cardLocation.classList.remove('cardActive')
    cardShooting.classList.remove('cardActive')
    cardDigital.classList.remove('cardActive')
    cardConseil.classList.add('cardActive')
}



const date = document.getElementById('date');
date.innerHTML = new Date().getFullYear();