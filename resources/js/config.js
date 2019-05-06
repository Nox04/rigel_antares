export const siteName = Laravel.siteName;
export const apiDomain = Laravel.apiDomain;
export const csrfToken = Laravel.csrfToken;

export const api = {
  messengers: 'messengers',
  workingMessengers: 'messengers/list/working',
  rides: 'rides',
  pendingRides: 'rides/list/pending',
}

export const menu = [
  {
    url: 'map.ridesPanel',
    icon: 'fa-map-marked-alt',
    name: 'Mapa',
    type: 'link'
  },
  {
    url: null,
    name: 'Gestión',
    type: 'section'
  },
  {
    url: 'messengers',
    icon: 'fa-motorcycle',
    name: 'Mensajeros',
    type: 'link'
  },
  {
    url: 'rides',
    icon: 'fa-route',
    name: 'Domicilios',
    type: 'link'
  },
];
