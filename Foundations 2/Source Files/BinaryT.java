package Grammar;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

public class BinaryT {

	
	public static abstract class AST 
	{
		public abstract String toString();
	}
	
	public static class Exc extends Exception 
	{
		private static final long serialVersionUID = 1L;

		public Exc(String message) 
		{
			super(message);
		}
	}

	public static abstract class Exp extends AST 
	{	}
	
	public static class ExpVar extends Exp 
	{
		String variable;

		public ExpVar(String s) {
			variable = s;
		}

		public String toString(){
			return variable;
		}
	}
	
	public static class ExpNumber extends Exp 
	{
		int number;

		public ExpNumber(int i) {
			number = i;
		}

		public String toString() {
			return Integer.toString(number);
		}

	}

	public static class ExpLeaf extends Exp
	{
		int leaf;

		public ExpLeaf(int i) {
			leaf = i;
		}

		public String toString() {
			return Integer.toString(leaf);
		}

	}




	public static class ExpPair extends Exp 
	{
		Exp expression1;
		Exp expression2;
		
		public ExpPair(Exp e1, Exp e2) 
		{
			expression1 = e1;
			expression2 = e2;
		}
		
		public String toString() 
		{
			return ("(" + expression1.toString() + ", " + expression2.toString() + ")"); 
		}
		
	}
	
	public static class Definition extends AST 
	{
		String variable;
		Exp expression;
		
		public Definition(String string, Exp e) 
		{
			variable = string;
			expression = e;
		}
		
		public String toString() 
		{
			return (variable + " = " + expression.toString());
		}
		
	}
	
	
	public static class ExpBracket extends Exp 
	{
		Exp expression;
		
		public ExpBracket(Exp e) 
		{
			expression = e;
		}
		
		public String toString() 
		{
			return ("(" + expression.toString() + ")"); // Returns bracket notation.
		}
		
	}	
	
	public static class ExpEquality extends Exp 
	{
        Exp expression1;
        Exp expression2;
       
        public ExpEquality(Exp e1, Exp e2) 
        {
                expression1 = e1;
                expression2 = e2;
        }
       
        public String toString() 
        {
                if(expression1.toString().equals(expression2.toString())) // If strings are equal, then return 1, otherwise 0.
                        return "1";
                else
                        return "0";             
        }
      
}

	
	public static class ExpSet extends Exp {
		ArrayList<Exp> expressions = new ArrayList<Exp>();
		
		public ExpSet(ArrayList<Exp> e) 
		{
			expressions.addAll(e);
		}
		
		public String toString() // Iterates through the expressions ArrayList in order to print out the set correctly.
		{
			Iterator<Exp> iter = expressions.iterator();
			String output = "";
			
			
			while(iter.hasNext())
			{
			output = output + iter.next();
			
			if(iter.hasNext())
			{
				output = output + ", ";
			}
			
			}
		
			return ( "{" + output + "}" );
		}
		
	}
	
	
	

	public static class ExpInfix extends Exp {
	    Exp expression1;
	    String expression2 = "";
       
        public ExpInfix(Exp e1, Exp e2) 
        {
                expression1 = e1;
                expression2 = e2.toString();
        }
       
        public String toString() // Checks for sets or pairs additionally to see if they arein the specific set.
        {
            expression2 = expression2.substring(1, expression2.length()-1);
            String[] list = expression2.split(", ");
           
            for(int i = 0; i < list.length; i++)
            {
            	
                    if(list[i].startsWith("("))
                    {
                            list[i] = list[i].concat(", " + list[i+1]);
                    }
                    
                    else if(list[i].startsWith("{"))
                    {
                            int x = 1;
                           
                        while(x+1 < list.length && !list[i].endsWith("}"))
                        {
                            list[i] = list[i].concat(", " + list[i+x]);
                            x++;
                        }
                    }
                    
                    
                    if(list[i].equals(expression1.toString())) // If the first expression is equal to list[i], return 1. Loops through again until end of list.
                    {
                    return "1";
                    }
            }
            
           return "0"; // Otherwise, return 0.
           
        }
                      
       
	}

	
	public static class Definitions extends AST 
	{
		List<Definition> defs;
		
		public Definitions(List<Definition> l) 
		{
			defs = l;
		}
		
		public String toString()
		{
			Iterator<Definition> i = defs.iterator();
			String res = "";
			do 
			{
				res += i.next().toString() + "\n";
			}
			while (i.hasNext());
			return res;
		}
		
	}
}
	