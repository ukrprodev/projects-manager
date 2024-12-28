import {BaseHttpService} from './base.http.service';

export class ProjectsService extends BaseHttpService {
  constructor() {
    super();
  }

  async getProjects(params: object = {}) {
    const defaultParams = {
      limit: 20,
      page: 1
    };

    return this.getHttp().get('/projects', {params: {...defaultParams, ...params}});
  }

  async getProjectTasks(projectId: Number) {
    return this.getHttp().get('/projects/' + projectId + '/tasks');
  }
}
