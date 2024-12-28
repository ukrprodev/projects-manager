import {BaseHttpService} from './base.http.service';

export class UserProjectsService extends BaseHttpService {
  constructor() {
    super();
  }

  async getUserProjects(userId: Number) {
    return this.getHttp().get('/user/' + userId + '/projects');
  }
}
