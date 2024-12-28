import {Component} from '@angular/core';
import {UserProjectsService} from '../../services/user-projects.service';
import {MatButtonModule} from '@angular/material/button';
import {MatTableModule} from '@angular/material/table';
import {MatIconModule} from '@angular/material/icon';
import {UserProjectsInterface} from '../../interfaces/projects/user-projects.interface';
import {ActivatedRoute, Router} from '@angular/router';
import {NgFor, NgIf} from '@angular/common';

@Component({
  selector: 'app-user-projects-view',
  imports: [
    MatButtonModule,
    MatTableModule,
    MatIconModule,
    NgFor,
    NgIf
  ],
  templateUrl: './user-projects-view.component.html',
  styleUrl: './user-projects-view.component.scss',
  standalone: true,
  providers: [UserProjectsService]
})

export class UserProjectsViewComponent {

  displayedColumns: string[] = [
    'title',
    'members',
    'estimatedHours',
    'actions'
  ]

  protected data: UserProjectsInterface = {
    user: '',
    projects: []
  };

  constructor(
    private userProjectsService: UserProjectsService,
    private route: ActivatedRoute,
    protected router: Router
  ) {
    route.params.subscribe(() => {
      this.userProjectsService.getUserProjects(this.route.snapshot.params['user'])
        .then(({data}) => this.data = data.data);
    });
  }
}
