import {Routes} from '@angular/router';
import {ProjectsListComponent} from './projects-list/projects-list.component';
import {UserProjectsViewComponent} from './user-projects-view/user-projects-view.component';
import {ProjectTasksViewComponent} from './project-tasks-view/project-tasks-view.component';

export const routes: Routes = [
  {
    path: '',
    component: ProjectsListComponent
  },
  {
    path: 'user/:user/projects',
    component: UserProjectsViewComponent
  },
  {
    path: 'project/:project/tasks',
    component: ProjectTasksViewComponent
  }
];
