import About from './pages/About';
import Experience from './pages/Experience';
import Portfolio from './pages/Portfolio';
import Aptitudes from './pages/Skills';
import Eduction from './pages/Eduction';
import Contact from './pages/Contact';





export default {
	mode:'history',
	routes:
	[
		{
			path:'/' , 
			component:About,
			name:'About'
		},
		{
			path:'/Experience' , 
			component:Experience,
			name:'Experience'
		},
		{
			path:'/Portfolio' , 
			component:Portfolio,
			name:'Portfolio'
		},
		{
			path:'/Aptitudes' , 
			component:Aptitudes,
			name:'Aptitudes'
		},
		{
			path:'/Eduction' , 
			component:Eduction,
			name:'Eduction'
		},
		{
			path:'/Contact' , 
			component:Contact,
			name:'Contact'
		}
	]
};