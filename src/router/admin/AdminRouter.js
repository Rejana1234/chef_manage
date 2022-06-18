import Dashboard from '../../views/admin/Mydashboard';
import UserRouter from './UserRouter';

//child router in admin
// import CountryRouter from './CountryRouter';
// import DistrictRouter from './DistrictRouter';
// import DivisionRouter from './DivisionRouter';
// import PostOfficeRouter from './PostOfficeRouter';
// import SeasonRouter from './SeasonRouter';
// import ThanaRouter from './ThanaRouter';
// import UnionRouter from './UnionRouter';
// import VillageRouter from './VillageRouter';
// import CropRouter from './CropRouter';
// import LandPreperation from './LandPreperation';
// import LandSize from './LandSize';
// import PoRouter from './PoRouter';
// import LocationRouter from './LocationRouter';
// import SelectionRouter from './SelectionRouter';
// import CultivationRouter from './CultivationRouter';
// import CultivationSectionRouter from './CultivationSectionRouter';

// import DepartmentRouter from './DepartmentRouter';

export default[
    {
        path: '/dashboard',
        component: Dashboard,
        children: [
            {
                path: '',
                name: 'Home',
                component: () => import('../../views/admin/Home.vue')
            },

            ...UserRouter,
            // ...DistrictRouter,
            // ...DivisionRouter,
            // ...ThanaRouter,
            // ...UnionRouter,
            // ...VillageRouter,
            // ...PostOfficeRouter,
            // ...SeasonRouter,
            // ...CropRouter,
            // ...LandPreperation,
            // ...LandSize,
            // ...PoRouter,
            // ...LocationRouter,
            // ...SelectionRouter,
            // ...CultivationRouter,
            // ...CultivationSectionRouter,
            // ...DepartmentRouter

        ]
    }
]