using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0705
{
    abstract class Document : IAttachable
    {
        public int Size { get; set; }
        public string Type { get; set; }
    }
}
