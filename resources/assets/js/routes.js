import Home from './components/home/Home.vue';
import Map from './components/map/Map.vue';
import ProfileWrapper from './components/profile/ProfileWrapper.vue';
import Profile from './components/profile/Profile.vue';
import EditProfile from './components/profile/edit-profile/EditProfile.vue';
import EditPassword from './components/profile/edit-password/EditPassword.vue';
import Messengers from './components/messengers/Messengers.vue';

export default [
	{
		path: '/',
		name: 'index',
		component: Home,
		meta: {requiresGuest: true}
  },
  {
		path: '/map',
		name: 'map',
		component: Map,
		meta: {requiresAuth: true}
  },
  {
		path: '/messengers',
		name: 'messengers',
		component: Messengers,
		meta: {requiresAuth: true}
  },
  {
		path: '/rides',
		name: 'rides',
		component: Map,
		meta: {requiresAuth: true}
	},
	{
		path: '/profile',
		component: ProfileWrapper,
		children: [
			{
				path: '',
				name: 'profile',
				component: Profile,
				meta: {requiresAuth: true}
			},
			{
				path: 'edit-profile',
				name: 'profile.editProfile',
				component: EditProfile,
				meta: {requiresAuth: true}
			},
			{
				path: 'edit-password',
				name: 'profile.editPassword',
				component: EditPassword,
				meta: {requiresAuth: true}
			},
			{
				path: '*',
				redirect: {
					name: 'profile'
				}
			}
		]
	},
];