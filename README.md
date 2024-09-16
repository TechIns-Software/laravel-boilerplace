# Laravel Boilerplate

This is a boileplace for admin panels used by our projects. It contains basic views and login functionality alongside with the nessesary files for deployment and testing.

### Build Frontend

For development you can run:
```
npm install
npm run build_dev
```

If using the docker solution mentioned at `Setup PHP` section a special docker is launched where:
1. Npm dependencies are installed
2. application is build upon watch.

If using the docker solution as mentioned above you may need to restart the container. Look at solution's REAMDE.md for that.

# Github actions & CI/CD
The actions are used for:

1. Automated Tagging
2. Running Unit tests upon PR

# Deployment & Building for release upon Server (CI/CD)

It contains the following basic files for building the AWS codepipeline. Also it contains the following files for deployment:

* appspec.production.yml For Deployment in a production traditional LEMP Stack
* appspec.staging.yml For Deployment in a staging traditional LEMP Stack

Also upon build the following files exist:

* .env.production for bootstrapping environment upon production
* .env.staging for bootstrapping environment upon staging

Any secret values are and should be replaced upon `buildspec.yml`
