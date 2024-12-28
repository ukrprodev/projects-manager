import axios, {AxiosInstance} from 'axios';

export class BaseHttpService {
  private readonly http: AxiosInstance;

  constructor() {
    this.http = axios.create({
      baseURL: 'https://api.projects-manager.local/api'
    });
  }

  getHttp() {
    return this.http;
  }

  setHttp(){
    throw new Error('Cannot modify an HTTP client in a direct way');
  }
}
