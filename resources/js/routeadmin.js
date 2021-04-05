import Projects from './admin/pages/Projects';
import Users from './admin/pages/Users';
import Home from './admin/pages/Home';
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
			path:'/admin/Eduction' , 
			component:Eduction,
			name:'Eduction'
		},
		{
			path:'/admin/Contact' , 
			component:Contact,
			name:'Contact'
		}
	]
};