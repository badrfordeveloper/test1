import About from './home/pages/About';
import Experience from './home/pages/Experience';
import Portfolio from './home/pages/Portfolio';
import Aptitudes from './home/pages/Skills';
import Eduction from './home/pages/Eduction';
import Contact from './home/pages/Contact';
import links from './home/pages/links';





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
			path:'/links' , 
			component:links,
			name:'links'
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