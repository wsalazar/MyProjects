using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace PhoneDialerProgram
{
    class Program 
    {
        public static int ProcessInput(ref char[] userInput) 
        {
            Console.Write("Enter a 7 character phone number: \n"); 
            for (int i = 0; i < 8; i++) 
                userInput[i] = Convert.ToChar(Console.Read()); 
            return ToDigit(ref userInput); 
        }
        static void Main(string[] args) 
        {
            char[] userInput = new char[7]; 
            //char user1, user2,user3,user4,user5,user6,user7; 
            if (ProcessInput(ref userInput) == -1) 
                Console.WriteLine("Invalid input, please try again."); 
            else showResults(ref userInput); 
        }
        public static void showResults(ref char[] userInput) 
        {
            for (int i = 0; i < 8; i++) 
            {
                Console.Write(userInput[i]); 
                if(i == 2) 
                Console.Write(userInput[i]); 
                if (i == 7) 
                Console.WriteLine("Invalid input, please try again."); 
            }
        }
　
        public static int ToDigit(ref char[] userInput) 
        {
            for (int i = 0; i < 7; i++)             
                userInput[i] = Char.ToUpper(userInput[i]);
            if (userInput[0] == '0') 
                return -1; 
            else if (userInput[0] == '5' && userInput[1] == '5' && userInput[2] == '5') 
                return -1; 
            for (int i = 0; i < 7; i++) 
            {
                if (userInput[i] > 32 && userInput[i] < 48 || userInput[i] > 57 && userInput[i] < 65 || userInput[i] > 90 && userInput[i] < 97 ) 
                    return -1; 
            } 
            for (int i = 0; i < 7; i++) 
            {
                switch (userInput[i]) 
                {
                    case 'A': 
                    case 'B': 
                    case 'C': 
                    userInput[i] = '2'; 
                    break; 
                    case 'D': 
                    case 'E': 
                    case 'F': 
                    userInput[i] = '3'; 
                    break; 
                    case 'G': 
                    case 'H': 
                    case 'I': 
                    userInput[i] = '4'; 
                    break; 
                    case 'J': 
                    case 'K': 
                    case 'L': 
                    userInput[i] = '5'; 
                    break; 
                    case 'M': 
                    case 'N': 
                    case 'O': 
                    userInput[i] = '6'; 
                    break; 
                    case 'p': 
                    case 'Q': 
                    case 'R': 
                    case 'S': 
                    userInput[i] = '7'; 
                    break; 
                    case 'T': 
                    case 'U': 
                    case 'V': 
                    userInput[i] = '8'; 
                    break; 
                    case 'W': 
                    case 'X': 
                    case 'Y': 
                    case 'Z': 
                    userInput[i] = '9'; 
                    break; 
                    }
                }
            return 0; 
            }
        }
}