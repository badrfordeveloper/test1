import Projects from './admin/pages/Projects';
import Users from './admin/pages/Users';
import Home from './admin/pages/Home';
import Login from './admin/pages/Login';
import Eduction from './home/pages/Eduction';
import Contact from './home/pages/Contact';





export default {
	mode:'history',
	routes:
	[
		{
			path:'/admin' , 
			component:Home,
			name :'Home'
		},
		{
			path:'/admin/Projects' , 
			component:Projects,
			name:'Projects'
		},
		{
			path:'/admin/Users' , 
			component:Users,
			name:'Users'
		},
		{
			path:'/admin/login' , 
			component:Login,
			name:'Login'
		},
		{
			path:'/admin/Contact' , 
			component:Contact,
			name:'Contact'
		}
	]
};