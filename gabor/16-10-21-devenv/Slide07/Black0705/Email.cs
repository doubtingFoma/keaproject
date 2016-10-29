using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0705
{
    class Email
    {
        public List<IAttachable> Attached { get; set; }

        public Email()
        {
            this.Attached = new List<IAttachable>();
        }

        public void Send()
        {
            Console.WriteLine("Sends mail with the following items attached:");
            for (int i = 0; i < Attached.Count; i++)
            {
                IAttachable item = Attached[i];
                Console.WriteLine($"{item.GetType().Name}, {item.Size}, {item.Type}");
            }
        }
    }
}
