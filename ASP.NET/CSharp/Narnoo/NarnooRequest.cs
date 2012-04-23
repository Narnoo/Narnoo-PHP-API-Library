using System;
using System.Collections.Generic;
using System.Text;

namespace Narnoo
{
    public abstract class NarnooRequest
    {
    
        public void SetAuth(string appkey,string secretkey)
        {
            throw new System.NotImplementedException();
        }

        public string GetResponse(string remote_url, string method,params RequestParameter[] options)
        {
            throw new System.NotImplementedException();
        }

        public void SetRequiredSSL(bool requried_ssl)
        {
            throw new System.NotImplementedException();
        }
    }
}
