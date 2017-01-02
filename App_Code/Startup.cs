using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(psw.Startup))]
namespace psw
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
